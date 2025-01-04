<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

class WelcomeComponent extends Component
{
    #[Title('Home - Promacnuts Ltd Shop')]
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        seo()->locale('en_GB')
            ->title('Home')
            ->description('Promacnuts Ltd is a private company with the main purpose of promoting macadamia nuts in the Rwandan market and outside.')
            ->keywords(
                'online shopping in rwanda',
                'online shopping sites in rwanda',
                'kigali',
                'grocery store kigali',
                'organic produce rwanda',
                'fresh groceries kigali',
                'Garden of Eden Produce',
                'rwandan organic company'
            )
            ->url(url()->current())
            ->canonical(url()->current())
            ->canonicalEnabled(true)
            ->images(asset('assets/Logo.png'))
            ->twitterImage(asset('assets/Logo.png'))
            ->twitterSite('@promacnuts')
            ->twitterDescription('Promacnuts Ltd is a private company with the main purpose of promoting macadamia nuts in the Rwandan market and outside.')
            ->twitterCreator('@promacnuts')
            ->robots('index', 'follow');

        return view('livewire.welcome-component');
    }
}
