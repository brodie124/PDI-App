<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDI extends Model {
    use HasFactory;

    const PDI_ITEMS = [
        'drive_coupling' => 'Drive Coupling',
        'gland_seal' => 'Gland / Seal',
        'seal_oil' => 'Seal Oil',
        'impeller' => 'Impeller',
        'drain_taps' => 'Drain Taps',
        'bearing_oil_grease' => 'Bearing Oil / Grease',
        'nrv' => 'NRV',
        'vac_compressor_oil' => 'Vac / Compressor Oil',
        'vac_compressor_belt' => 'Vac / Compressor Belt',
        'priming_system' => 'Priming System',
        'venturi_jet' => 'Venturi Jet',
        'air_filter' =>'Air Filter',
        'oil'=> 'Oil',
        'oil_filter' => 'Oil Filter',
        'oil_leaks' => 'Oil Leaks',
        'fuel_filter' => 'Fuel Filter',
        'fuel_contamination' => 'Water In Fuel Tank',
        'fuel_leaks' => 'Fuel Leaks',
        'tappets' => 'Tappets',
        'antifreeze_level' => 'Antifreeze Level',
        'water_leaks' => 'Water Leaks',
        'belts' => 'Belts',
        'starter_motor' => 'Starter Motor',
        'charging_output' => 'Charging Output',
        'shutdown_system' => 'Shutdown System',
        'battery' => 'Battery',
        'lifting_bracket' => 'Lifting Bracket',
        'all_guards_fitted' => 'All Guards Fitted',
        'draw_bar' => 'Draw Bar',
        'wheels' => 'Wheels',
        'mountings' => 'Mountings'
    ];
}
