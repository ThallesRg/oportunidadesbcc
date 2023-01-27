@extends('layouts.post')

@section('content')
<section class="show-page pt-4 mb-5">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-sm-12 col-md-8">
        <div class="job-listing border">
          <div class="job-info">
            <div class="job-hdr p-3">
              <p class="job-title">{{$event->name}}</p>
            </div>
            <div class="job-bdy p-3 my-3">
              <div class="job-level-description">
                <p class="font-weight-bold">Descrição do evento</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">Local</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$event->location}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Data de Início:</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$event->start_date}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Data de Término:</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$event->end_date}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Descrição</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$event->description}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Site</td>
                      <td width="3%">:</td>
                      <td width="64%"><a href="{{$event->website}}" style="text-decoration: underline; color: blue">{{$event->website}}</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


@push('css')
<style>
  .company-banner {
    min-height: 20vh;
    position: relative;
    overflow: hidden;
  }

  .company-banner-img {
    width: 100%;
    height: auto;
    overflow: hidden;
  }

  .banner-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, .3));
    width: 100%;
    height: 200px;
  }

  .company-website {
    position: absolute;
    right: 20px;
    bottom: 20px;
    color: white;
  }

  .company-media {
    position: absolute;
    display: flex;
    align-items: center;
    left: 2rem;
    bottom: 1rem;
    color: #333;
    padding-right: 2rem;
    background-color:rgba(255,255,255,.8);
  }

  .company-logo {
    max-width: 100px;
    height: auto;
    margin-right: 1rem;
    padding: 1rem;
    background-color: white;
  }

  .company-category {
    font-size: 1.3rem;
  }

  .company-link:hover {
    color: #ddd;
  }

  .job-title {
    font-size: 1.3rem;
    font-weight: bold;
  }

  .job-hdr {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(to right, #e1edf7, #EDF2F7)
  }

  .job-item{
    margin-bottom: .5rem;
    padding:.5rem 0;
  }
  .job-item:hover {
    background-color:#eee;
  } 

</style>
@endpush

@push('js')

@endpush