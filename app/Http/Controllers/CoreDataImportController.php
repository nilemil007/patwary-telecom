<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\Balance;
use App\Models\Bso;
use App\Models\C2c;
use App\Models\C2s;
use App\Models\DdHouse;
use App\Models\Dso;
use App\Models\Esaf;
use App\Models\FcdGa;
use App\Models\LiveActivation;
use App\Models\LiveC2c;
use App\Models\LiveSimIssue;
use App\Models\Retailer;
use App\Models\SimInventory;
use App\Models\SimIssue;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class CoreDataImportController extends Controller
{
    // Activation Index
    public function activationIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.index', [
            'activations' => Activation::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // Live Activation Index
    public function liveActivationIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.live-activation', [
            'activations' => LiveActivation::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // FCD GA Index
    public function fcdGaIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.activation.fcd-ga', [
            'activations' => FcdGa::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5)
        ]);
    }

    // Act Import (Common)
    private function actImport( $filePath, $model ): void
    {
        SimpleExcelReader::create( $filePath, 'xlsx' )->getRows()
            ->each(function(array $rowProperties) use ($model) {
                $model->create([
                    'dd_house_id'       => Retailer::firstWhere('retailer_code', $rowProperties['RETAILERCODE'])->dd_house_id,
                    'supervisor_id'     => Retailer::firstWhere('retailer_code', $rowProperties['RETAILERCODE'])->supervisor_id,
                    'rso_id'            => Retailer::firstWhere('retailer_code', $rowProperties['RETAILERCODE'])->rso_id,
                    'retailer_id'       => Retailer::firstWhere('retailer_code', $rowProperties['RETAILERCODE'])->id,
                    'product_code'      => $rowProperties['PRODUCTCODE'],
                    'product_name'      => $rowProperties['PRODUCTNAME'],
                    'sim_serial'        => $rowProperties['SIMNO'],
                    'msisdn'            => $rowProperties['MSISDN'],
                    'selling_price'     => $rowProperties['SELLINGPRICE'],
                    'activation_date'   => $rowProperties['ACTIVATIONDATE'],
                    'bio_date'          => $rowProperties['BIODATE'],
                ]);
            });
    }

    // Activation Import
    public function activationImport(Request $request): RedirectResponse
    {
        $this->actImport( $request->import_activation, new Activation );

        return redirect()->route('raw.activation')->with('success', 'Activation imported successfully.');
    }

    // Live Activation Import
    public function liveActivationImport(Request $request): RedirectResponse
    {
        $this->actImport( $request->import_activation, new LiveActivation );

        return redirect()->route('raw.live.activation')->with('success', 'Live activation imported successfully.');
    }

    // FCD GA Import
    public function fcdGaImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_activation, 'xlsx' )->getRows()
            ->each(function(array $rowProperties) {

                FcdGa::create([
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $rowProperties['Retailer Code'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $rowProperties['Retailer Code'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $rowProperties['Retailer Code'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $rowProperties['Retailer Code'])->id,
                    'date'          => Carbon::parse($rowProperties['Subscriber First Call Date (New RGA)'])->toDateString(),
                    'activation'    => $rowProperties['Subscriber Count'],
                ]);
            });

        return redirect()->route('raw.fcd.ga')->with('success', 'FCD GA imported successfully.');
    }

    // Activation Delete All
    public function activationDestroy(): RedirectResponse
    {
        Activation::truncate();

        return redirect()->route('raw.activation')->with('success', 'Activation deleted successfully.');
    }

    // Live Activation Delete All
    public function liveActivationDestroy(): RedirectResponse
    {
        LiveActivation::truncate();

        return redirect()->route('raw.live.activation')->with('success', 'Live activation deleted successfully.');
    }

    // FCD GA Delete All
    public function fcdGaDestroy(): RedirectResponse
    {
        FcdGa::truncate();

        return redirect()->route('raw.fcd.ga')->with('success', 'FCD GA deleted successfully.');
    }


    ########################################## C2C #####################################################

    // C2C Index
    public function c2cIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2c.c2c', [
            'c2cs' => C2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Live C2C Index
    public function liveC2cIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2c.live-c2c', [
            'c2cs' => LiveC2c::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // C2C Import
    public function c2cImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_c2c, 'xlsx' )->getRows()
            ->each(function(array $rowProperties) {

                C2c::create([
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->id,
                    'date'          => $rowProperties['Date'],
                    'amount'        => $rowProperties['Value'],
                ]);
            });

        return redirect()->route('raw.c2c')->with('success', 'C2C imported successfully.');
    }

    // Live C2C Import
    public function liveC2cImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_c2c, 'xlsx' )->getRows()
            ->each(function(array $rowProperties) {

                LiveC2c::create([
                    'dd_house_id'   => Retailer::firstWhere('itop_number', $rowProperties['To Msisdn'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('itop_number', $rowProperties['To Msisdn'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('itop_number', $rowProperties['To Msisdn'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('itop_number', $rowProperties['To Msisdn'])->id,
                    'date'          => now(),
                    'amount'        => $rowProperties['Transfer Mrp'],
                ]);
            });

        return redirect()->route('raw.live.c2c')->with('success', 'Live C2C imported successfully.');
    }

    // C2C Delete All
    public function c2cDestroy(): RedirectResponse
    {
        C2c::truncate();
        return redirect()->route('raw.c2c')->with('success', 'C2C deleted successfully.');
    }

    // Live C2C Delete All
    public function liveC2cDestroy(): RedirectResponse
    {
        LiveC2c::truncate();
        return redirect()->route('raw.live.c2c')->with('success', 'Live C2C deleted successfully.');
    }



    ########################################## C2S #####################################################

    // C2S Index
    public function c2sIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.c2s.c2s', [
            'c2s' => C2s::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // C2S Import
    public function c2sImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_c2s, 'xlsx' )->getRows()
            ->each(function(array $rowProperties) {

                C2s::create([
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $rowProperties['RETAILER_CODE'])->id,
                    'date'          => $rowProperties['Date'],
                    'amount'        => $rowProperties['Value'],
                ]);
            });

        return redirect()->route('raw.c2s')->with('success', 'C2S imported successfully.');
    }

    // C2S Delete All
    public function c2sDestroy(): RedirectResponse
    {
        C2s::truncate();
        return redirect()->route('raw.c2s')->with('success', 'C2S deleted successfully.');
    }



    ######################################## Sim Issue ##################################################

    // Sim Issue Index
    public function simIssueIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.sim-issue.sim-issue', [
            'simIssues' => SimIssue::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Live Sim Issue Index
    public function liveSimIssueIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.sim-issue.live-sim-issue', [
            'simIssues' => LiveSimIssue::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Sim Issue Import (Common)
    private function issueSimImport( $filePath, $model ): void
    {
        SimpleExcelReader::create( $filePath, 'xlsx' )->getRows()
            ->each(function(array $row) use ($model) {
                $model->create([
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $row['RETAILERCODE'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $row['RETAILERCODE'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $row['RETAILERCODE'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $row['RETAILERCODE'])->id,
                    'product_code'  => $row['PRODUCTCODE'],
                    'product_name'  => $row['PRODUCTNAME'],
                    'selling_price' => $row['SELLINGPRICE'],
                    'sim_serial'    => $row['SIMNO'],
                    'issue_date'    => $row['ISSUEDATE'],
                ]);
            });
    }

    // Sim Issue Import
    public function simIssueImport(Request $request): RedirectResponse
    {
        $this->issueSimImport( $request->import_sim_issue, new SimIssue);

        return redirect()->route('raw.sim.issue')->with('success', 'Sim Issue imported successfully.');
    }

    // Live Sim Issue Import
    public function liveSimIssueImport(Request $request): RedirectResponse
    {
        $this->issueSimImport( $request->import_sim_issue, new LiveSimIssue());

        return redirect()->route('raw.live.sim.issue')->with('success', 'Live Sim Issue imported successfully.');
    }

    // Sim Issue Delete All
    public function simIssueDestroy(): RedirectResponse
    {
        SimIssue::truncate();
        return redirect()->route('raw.sim.issue')->with('success', 'Sim Issue deleted successfully.');
    }

    // Live Sim Issue Delete All
    public function liveSimIssueDestroy(): RedirectResponse
    {
        LiveSimIssue::truncate();
        return redirect()->route('raw.live.sim.issue')->with('success', 'Live Sim Issue deleted successfully.');
    }



    ######################################## Balance ##################################################

    // Balance Index
    public function balanceIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.balance.balance', [
            'balances' => Balance::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Balance Import
    public function balanceImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_balance, 'xlsx' )->getRows()
            ->each(function(array $row) {

                Balance::create([
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $row['RETAILER_CODE'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $row['RETAILER_CODE'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $row['RETAILER_CODE'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $row['RETAILER_CODE'])->id,
                    'date'          => $row['Date'],
                    'amount'        => $row['Value'],
                ]);
            });

        return redirect()->route('raw.balance')->with('success', 'Balance imported successfully.');
    }

    // Balance Delete All
    public function balanceDestroy(): RedirectResponse
    {
        Balance::truncate();

        return redirect()->route('raw.balance')->with('success', 'Balance deleted successfully.');
    }



    ########################################### Bso ####################################################

    // Bso Index
    public function bsoIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.bso.bso', [
            'bsos' => Bso::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Bso Dso Import (Common)
    private function bsoDsoImport( $filePath, $model ): void
    {
        SimpleExcelReader::create( $filePath, 'xlsx' )->getRows()
            ->each(function(array $row) use ($model) {
                $model->create([
                    'dd_house_id'   => Retailer::firstWhere('itop_number', $row['Sender Service Number'])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('itop_number', $row['Sender Service Number'])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('itop_number', $row['Sender Service Number'])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('itop_number', $row['Sender Service Number'])->id,
                    'day'           => $row['Txn'],
                    'amount'        => $row['ToT'],
                    'eligibility'   => $row['Eligibility'],
                ]);
            });
    }

    // Bso Import
    public function bsoImport(Request $request): RedirectResponse
    {
        $this->bsoDsoImport($request->import_bso, new Bso());

        return redirect()->route('raw.bso')->with('success', 'BSO imported successfully.');
    }

    // Bso Delete All
    public function bsoDestroy(): RedirectResponse
    {
        Bso::truncate();

        return redirect()->route('raw.bso')->with('success', 'BSO deleted successfully.');
    }



    ########################################### Dso ####################################################

    // Dso Index
    public function dsoIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.dso.dso', [
            'dsos' => Dso::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Dso Import
    public function dsoImport(Request $request): RedirectResponse
    {
        $this->bsoDsoImport($request->import_dso, new Dso());

        return redirect()->route('raw.dso')->with('success', 'DSO imported successfully.');
    }

    // Dso Delete All
    public function dsoDestroy(): RedirectResponse
    {
        Dso::truncate();

        return redirect()->route('raw.dso')->with('success', 'DSO deleted successfully.');
    }



    ########################################### eSAF ###################################################

    // Esaf Index
    public function esafIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.esaf.esaf', [
            'esafs' => Esaf::with('ddHouse','rso','supervisor','retailer')
                ->latest()
                ->paginate(5),
        ]);
    }

    // Esaf Import
    public function esafImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_esaf, 'xlsx' )->getRows()
            ->each(function(array $row) {

                Esaf::create([
                    'dd_house_id'       => Retailer::firstWhere('retailer_code', $row['Bio Login User'])->dd_house_id,
                    'supervisor_id'     => Retailer::firstWhere('retailer_code', $row['Bio Login User'])->supervisor_id,
                    'rso_id'            => Retailer::firstWhere('retailer_code', $row['Bio Login User'])->rso_id,
                    'retailer_id'       => Retailer::firstWhere('retailer_code', $row['Bio Login User'])->id,
                    'customer_name'     => $row['Customer Name'],
                    'customer_number'   => $row['MSISDN'],
                    'alternate_number'  => $row['Alternate Number'],
                    'email'             => $row['Email'],
                    'gender'            => $row['Gender'],
                    'reason'            => $row['Reason'],
                    'address'           => $row['Present Address'],
                    'date'              => Carbon::parse( $row['Biometric Verification Date'] )->toDateString(),
                    'status'            => $row['Status'],
                ]);
            });

        return redirect()->route('raw.esaf')->with('success', 'Esaf imported successfully.');
    }

    // Esaf Delete All
    public function esafDestroy(): RedirectResponse
    {
        Esaf::truncate();

        return redirect()->route('raw.esaf')->with('success', 'Esaf deleted successfully.');
    }



    ########################################### Sim Inventory ###################################################

    // Sim Inventory Index
    public function simInventoryIndex(Request $request): Application|Factory|View
    {
        return view('reports.back.inventory.sim.sim', [
            'inventory' => SimInventory::with('ddHouse')->latest()->paginate(5),
        ]);
    }

    // Sim Inventory Import
    public function simInventoryImport(Request $request): RedirectResponse
    {
        SimpleExcelReader::create( $request->import_sim_inventory, 'xlsx' )->getRows()
            ->each(function(array $row) {

                SimInventory::create([
                    'dd_house_id'   => DdHouse::firstWhere('code', $row['DistributorCode'])->id,
                    'product_code'  => $row['ProductCode'],
                    'product_name'  => $row['ProductName'],
                    'lifting_price' => $row['LiftingPrice'],
                    'sim_serial'    => $row['SimNo'],
                ]);
            });

        return redirect()->route('raw.sim.inventory')->with('success', 'Sim Inventory imported successfully.');
    }

    // Sim Inventory Delete All
    public function simInventoryDestroy(): RedirectResponse
    {
        SimInventory::truncate();

        return redirect()->route('raw.sim.inventory')->with('success', 'Sim Inventory deleted successfully.');
    }

}
