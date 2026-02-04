<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\EmailList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Template;

class CampaignSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $emailList = EmailList::query()->inRandomOrder()->first();
            $template = \App\Models\Template::query()->inRandomOrder()->first();

            Campaign::factory()->create([
                'email_list_id' => $emailList->id,
                'template_id' => $template->id,
            ]);
        }
    }
}
