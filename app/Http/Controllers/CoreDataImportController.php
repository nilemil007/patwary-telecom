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
                    'dd_house_id'       => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[2]])->dd_house_id,
                    'supervisor_id'     => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[2]])->supervisor_id,
                    'rso_id'            => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[2]])->rso_id,
                    'retailer_id'       => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[2]])->id,
                    'product_code'      => $rowProperties[array_keys($rowProperties)[7]],
                    'product_name'      => $rowProperties[array_keys($rowProperties)[8]],
                    'sim_serial'        => $rowProperties[array_keys($rowProperties)[9]],
                    'msisdn'            => $rowProperties[array_keys($rowProperties)[10]],
                    'selling_price'     => $rowProperties[array_keys($rowProperties)[11]],
                    'activation_date'   => $rowProperties[array_keys($rowProperties)[12]],
                    'bio_date'          => $rowProperties[array_keys($rowProperties)[13]],
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
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->id,
                    'date'          => $rowProperties[array_keys($rowProperties)[11]],
                    'amount'        => $rowProperties[array_keys($rowProperties)[12]],
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
                    'dd_house_id'   => Retailer::firstWhere('itop_number', $rowProperties[array_keys($rowProperties)[5]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('itop_number', $rowProperties[array_keys($rowProperties)[5]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('itop_number', $rowProperties[array_keys($rowProperties)[5]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('itop_number', $rowProperties[array_keys($rowProperties)[5]])->id,
                    'date'          => now(),
                    'amount'        => $rowProperties[array_keys($rowProperties)[9]],
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
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $rowProperties[array_keys($rowProperties)[3]])->id,
                    'date'          => $rowProperties[array_keys($rowProperties)[13]],
                    'amount'        => $rowProperties[array_keys($rowProperties)[14]],
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
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->id,
                    'product_code'  => $row[array_keys($row)[7]],
                    'product_name'  => $row[array_keys($row)[8]],
                    'selling_price' => $row[array_keys($row)[9]],
                    'sim_serial'    => $row[array_keys($row)[10]],
                    'issue_date'    => $row[array_keys($row)[0]],
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
                    'dd_house_id'   => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('retailer_code', $row[array_keys($row)[4]])->id,
                    'date'          => $row[array_keys($row)[14]],
                    'amount'        => $row[array_keys($row)[15]],
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
                    'dd_house_id'   => Retailer::firstWhere('itop_number', $row[array_keys($row)[3]])->dd_house_id,
                    'supervisor_id' => Retailer::firstWhere('itop_number', $row[array_keys($row)[3]])->supervisor_id,
                    'rso_id'        => Retailer::firstWhere('itop_number', $row[array_keys($row)[3]])->rso_id,
                    'retailer_id'   => Retailer::firstWhere('itop_number', $row[array_keys($row)[3]])->id,
                    'day'           => $row[array_keys($row)[4]],
                    'amount'        => $row[array_keys($row)[5]],
                    'eligibility'   => $row[array_keys($row)[6]],
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
                    'dd_house_id'       => Retailer::firstWhere('retailer_code', $row[array_keys($row)[12]])->dd_house_id,
                    'supervisor_id'     => Retailer::firstWhere('retailer_code', $row[array_keys($row)[12]])->supervisor_id,
                    'rso_id'            => Retailer::firstWhere('retailer_code', $row[array_keys($row)[12]])->rso_id,
                    'retailer_id'       => Retailer::firstWhere('retailer_code', $row[array_keys($row)[12]])->id,
                    'customer_name'     => $row[array_keys($row)[2]],
                    'customer_number'   => $row[array_keys($row)[0]],
                    'alternate_number'  => $row[array_keys($row)[4]],
                    'email'             => $row[array_keys($row)[3]],
                    'gender'            => $row[array_keys($row)[1]],
                    'reason'            => $row[array_keys($row)[7]],
                    'address'           => $row[array_keys($row)[13]],
                    'date'              => Carbon::parse( $row[array_keys($row)[11]] )->toDateString(),
                    'status'            => $row[array_keys($row)[6]],
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
                    'product_code'  => $row[array_keys($row)[3]],
                    'product_name'  => $row[array_keys($row)[4]],
                    'lifting_price' => $row[array_keys($row)[5]],
                    'sim_serial'    => $row[array_keys($row)[6]],
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
