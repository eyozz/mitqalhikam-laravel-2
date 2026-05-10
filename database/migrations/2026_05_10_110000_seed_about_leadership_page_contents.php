<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $contents = [
            ['about', 'leadership', 'pembina_name', 'Sigit Basuki', 'text'],
            ['about', 'leadership', 'pembina_photo', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCowMwMNuuodAKEpt42mj39-8MYpfpQhD7HHLcH-LuGQQDBRGSM_Rq5D2Pci0GAy4Ux9UA91KTqgjyj6OnMLtduCai3f009ukBfYQjCsY9_xRp27e-vpyi7RlrUSRnH7G4dBC9b8tZ5U3zgkq4JGteYcK0w6-3zBP8zx9osAAmqrz9V7LX83TZGz5bo03pvp-4iYe7JLlj02-sH3G-mGWzQeZdYgAwC9axjZC5hqvNkhZrATs6BfZDHsaZheyi17ESw0bjK6EhvUn2K', 'image'],
            ['about', 'leadership', 'pengawas_name', 'Muzayyin Marzuki', 'text'],
            ['about', 'leadership', 'pengawas_photo', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDdO-UnbachbWq0IzmEhIVQH7B7ddqeteqyfmXRQl7KXZ7Se6SCkRMf6YQrt_dJg3GxLeBaQU0HS8nbkxR0C9e58Vu4M-S8w5yHpcnb9Kofg4dhnLzuf4a4dhiLEBihi98IchtFusUXg4ISZ4FEiOomBHiJG6Jh3TCH4rKTekeNpDSMHpa_3FjgCGScIpyYkPO_52GX5bGThtuGhN4l66dv-aTW0nXW-lFIrEezH2444GyVIu9zSQPvwzZKkGjxs7TeI_zD_TJVroDy', 'image'],
            ['about', 'leadership', 'ketua_yayasan_name', 'Anas Ma’ruf', 'text'],
            ['about', 'leadership', 'ketua_yayasan_photo', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDOKEHUqnjCVkqjASu36zkkJGYDBbX4pqM3g2cpqA8sJ9j5beVs3LYg4WnU68D1Qq6IgNtwyc59tC6PXV3ugkCQg1HdMdcTC0v6is-HKEsI6CHazSZQtnXC5eHQlLlxOcQUanvWBTyXjlq-_PHwEKP_mFux0wdnjyP4w6L0ni-RFbinL0nvlQRWqFzNBoX2mI6d_Zky_-zh_9l3PL3xG_5gRtspbqfQ1WCTotkhxveEU1dBNbmeswEsERJW-dfIGr9lOXpgFadUPjxm', 'image'],
            ['about', 'leadership', 'kepala_sekolah_name', 'Dudi Budi Astoko, S.Pd.I., M.Pd.', 'text'],
            ['about', 'leadership', 'kepala_sekolah_photo', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAMAzwsTBHihMR8-AxyXCWwS5qW9-yF9uBmK--8_dDFK8FJGDPKESr6-oNajHZqtz-kkQKiFgaNSctG92hkqClVir-Vf2rTCWlJAfIqv2nQHQhhud5BJdPdVBYG9U0_r6uB3rYbGnnPZvKE8EoVr3LrqYDDqRDcV-qBxpZQ6UFJMXu266fVjdNZUfRL-xyFk8E2Gs3xBOAeOJAomCuTIQUURQaVZ74SGL-PAWQVVxhH0Oms9O5R5RX-e8GYxGwBtzbBFP4WadkZYW2T', 'image'],
        ];

        foreach ($contents as [$page, $section, $field, $value, $type]) {
            DB::table('page_contents')->updateOrInsert(
                compact('page', 'section', 'field'),
                compact('value', 'type') + ['created_at' => $now, 'updated_at' => $now],
            );
        }
    }

    public function down(): void
    {
        DB::table('page_contents')
            ->where('page', 'about')
            ->where('section', 'leadership')
            ->whereIn('field', [
                'pembina_name',
                'pembina_photo',
                'pengawas_name',
                'pengawas_photo',
                'ketua_yayasan_name',
                'ketua_yayasan_photo',
                'kepala_sekolah_name',
                'kepala_sekolah_photo',
            ])
            ->delete();
    }
};
