<?php

namespace Aaran\Devops\Providers;

use Aaran\Devops\Livewire\Class\JobImagesList;
use Aaran\Devops\Livewire\Class\JobList;
use Aaran\Devops\Livewire\Class\Lookup\ModuleLookup;
use Aaran\Devops\Livewire\Class\ModuleList;
use Aaran\Devops\Livewire\Class\TaskActivity;
use Aaran\Devops\Livewire\Class\TaskCommentsList;
use Aaran\Devops\Livewire\Class\TaskList;
use Aaran\Devops\Livewire\Class\TaskReplyList;
use Aaran\Devops\Livewire\Class\TaskShow;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DevopsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(DevopsRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();
         Livewire::component('devops::job-managers-list', JobList::class);
         Livewire::component('devops::task-list', TaskList::class);
         Livewire::component('devops::task-show', TaskActivity::class);
         Livewire::component('devops::modules', ModuleList::class);

         Livewire::component('devops::module-lookup', ModuleLookup::class);


//         Livewire::component('task-commends-list', TaskCommentsList::class);
//         Livewire::component('task-reply-list', TaskReplyList::class);
//         Livewire::component('job-images-list', JobImagesList::class);

        // Livewire::component('devops::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'devops');
    }
}
