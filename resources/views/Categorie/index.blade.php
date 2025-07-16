@extends('layouts.app')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories /</span> informations
        <span style="margin-left:70%">
            <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalCenter"
          >

          <i class="fa-solid fa-plus"></i> 
          </button>
    
    
    </h4>
     
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Categorie</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
             
            </tbody>
          </table>
          <div class="flex"></div>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

    
    


   

    </div>
    <!-- / Content -->

   
  </div>
  <!-- Content wrapper -->
   {{-- register modal --}}
   @include('Categorie.addCateg_modal')

 

@endsection