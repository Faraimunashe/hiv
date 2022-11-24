<x-app-layout>
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-green">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
              <div class="card-content">
                <h4 class="card-title">ART Register Count</h4>
                <span>{{\App\Models\ArtRegister::count()}}</span>
                <p class="mb-0 text-sm">
                  <span class="text-nowrap">Total Patients in ART Register</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
              <div class="card-content">
                <h4 class="card-title">PreART Register Count</h4>
                <span>{{\App\Models\PreArtRegister::count()}}</span>
                <p class="mb-0 text-sm">
                  <span class="text-nowrap">PreArt Register Patients</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-purple">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
              <div class="card-content">
                <h4 class="card-title"></h4>
                <span>{{\App\Models\ArtRegister::count()}}</span>
                <p class="mb-0 text-sm">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card l-bg-orange">
            <div class="card-statistic-3">
              <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
              <div class="card-content">
                <h4 class="card-title">Earning</h4>
                <span>$2,658</span>
                <div class="progress mt-1 mb-1" data-height="8" style="height: 8px;">
                  <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                </div>
                <p class="mb-0 text-sm">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
