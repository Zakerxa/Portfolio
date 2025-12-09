<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // app/Console/Commands/GenerateSitemap.php

    protected $signature = 'generate:sitemap'; // <--- Check this line

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        // 1. Start the Sitemap
        $sitemap = Sitemap::create();

        // 2. Add Static Pages (Your Vue Router Paths)
        $sitemap->add(Url::create('/')        // Home Page
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));

        $sitemap->add(Url::create('/about') // Contact Page
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create('/service') // Contact Page
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create('/contact') // Contact Page
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.8));

        // 3. Add Dynamic Content (If applicable, e.g., portfolio projects)
        // If you have a 'Project' model:
        /*
Project::all()->each(function (Project $project) use ($sitemap) {
    $sitemap->add(Url::create("/projects/{$project->slug}")
        ->setLastModificationDate($project->updated_at)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        ->setPriority(0.7));
});
*/

        // 4. Write the Sitemap to the Public Folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
