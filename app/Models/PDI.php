<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDI extends Model {
    use HasFactory;

    const PDI_ITEMS = [
        'Drive Coupling' => 'drive_coupling',
        'Gland / Seal' => 'gland_seal',
        'Seal Oil' => 'seal_oil',
        'Impeller' => 'impeller',
        'Drain Taps' => 'drain_taps',
        'Bearing Oil / Grease' => 'bearing_oil_grease',
        'NRV' => 'nrv',
        'Vac / Compressor Oil' => 'vac_compressor_oil',
        'Vac / Compressor Belt' => 'vac_compressor_belt',
        'Priming System' => 'priming_system',
        'Venturi Jet' => 'venturi_jet',
        'Air Filter' => 'air_filter',
        'Oil' => 'oil',
        'Oil Filter' => 'oil_filter',
        'Oil Leaks' => 'oil_leaks',
        'Fuel Filter' => 'fuel_filter',
        'Water In Fuel Tank' => 'fuel_contamination',
        'Fuel Leaks' => 'fuel_leaks',
        'Tappets' => 'tappets',
        'Antifreeze Level' => 'antifreeze_level',
        'Water Leaks' => 'water_leaks',
        'Belts' => 'belts',
        'Starter Motor' => 'starter_motor',
        'Charging Output' => 'charging_output',
        'Shutdown System' => 'shutdown_system',
        'Battery' => 'battery',
        'Lifting Bracket' => 'lifting_bracket',
        'All Guards Fitted' => 'all_guards_fitted',
        'Draw Bar' => 'draw_bar',
        'Wheels' => 'wheels',
        'Mountings' => 'mountings'
    ];
}
