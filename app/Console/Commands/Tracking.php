<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Device;
use App\Report;

class Tracking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Queries devices and corresponding reports
     from the database and dumps them to the screen.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $devices_with_reports = Device::with('reports')
            ->take(5)
            ->get();

        $table = $devices_with_reports->flatMap(function($item, $key) {
            return $item->reports->map(function($report) use ($item) {
                return [
                    'id' => $item->ID,
                    'name' => $item->Name,
                    'report_id' => $report->ID,
                    'report_location' => $report->Location,
                    'report_datecreated' => $report->DateCreated
                ];
            });
        })->sortByDesc('report_datecreated');

        $headers = ['Report ID', 'Device ID', 'Device Name', 'Location', 'DateCreated'];
        $this->table($headers, $table);
    }
}
