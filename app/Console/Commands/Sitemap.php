<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sitemap';

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
        $sitemap = \App::make("sitemap");


        //animals
        $animals = \Animal::all();
        foreach ($animals as $animal) {
            $sitemap->add(\URL::to($animal->url), $animal->updated_at, '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap/animals');
        $sitemap->addSitemap(\URL::to('sitemap/animals.xml'));
        $sitemap->model->resetItems();

        //properties
        $properties = \Property::where('index', true)->get();
        foreach ($properties as $property) {
            $sitemap->add(\URL::to($property->url), $property->updated_at, '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap/properties');
        $sitemap->addSitemap(\URL::to('sitemap/properties.xml'));
        $sitemap->model->resetItems();


        //category
        $categories = \Category::where('index', true)->get();
        foreach ($categories as $category) {
            $sitemap->add(\URL::to($category->url), $category->updated_at, '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap/categories');
        $sitemap->addSitemap(\URL::to('sitemap/categories.xml'));
        $sitemap->model->resetItems();


        //taxonomy
        $taxonomies = \Taxonomy::where('index', true)->get();
        foreach ($taxonomies as $taxonomy) {
            $sitemap->add(\URL::to($taxonomy->url), $taxonomy->updated_at, '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap/taxonomies');
        $sitemap->addSitemap(\URL::to('sitemap/taxonomies.xml'));
        $sitemap->model->resetItems();


        //environment
        $environments = \Environment::where('index', true)->get();
        foreach ($environments as $environment) {
            $sitemap->add(\URL::to($environment->url), $environment->updated_at, '0.9', 'weekly');
        }

        $sitemap->store('xml', 'sitemap/environments');
        $sitemap->addSitemap(\URL::to('sitemap/environments.xml'));
        $sitemap->model->resetItems();



        //index
        $sitemap->store('sitemapindex', 'sitemap');
        
        $this->info('Created');
    }
}
