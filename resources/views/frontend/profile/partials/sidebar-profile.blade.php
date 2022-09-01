
  

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Profile Settings</h5>
    </div>

      <div class="list-group list-group-flush" role="tablist">
          <a href="{{route('profile.dashboard')}}" class="list-group-item list-group-item-action {{set_active_views('profile.dashboard')}}" >
            Dashboard
          </a>
          {{-- Adopsi Manajemen --}}
          <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-dashboard fa-fw mr-3"></span>
                <span class="menu-collapsed">Adopsi Manajemen</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
          </a>
          <div id='submenu1' class="collapse sidebar-submenu show">
          <a href="{{route('profile.adopsi')}}" class="list-group-item list-group-item-action ">
              <span class="menu-collapsed {{set_active_views('profile.dashboard')}}">Kiriman Adopsi</span>
          </a>
          <a href="{{route('profile.permintaanAdopsi')}}" class="list-group-item list-group-item-action ">
              <span class="menu-collapsed">Permintaan Adopsi</span>
          </a>
          <a href="{{route('profile.pengajuanAdopsi')}}" class="list-group-item list-group-item-action ">
            <span class="menu-collapsed">Pengajuan Adopsi anda </span>
        </a>
        </div>
        {{-- Pemacakan Manajemen --}}
        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class=" list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-start align-items-center">
              <span class="fa fa-dashboard fa-fw mr-3"></span>
              <span class="menu-collapsed">Pemacakan Manajemen</span>
              <span class="submenu-icon ml-auto"></span>
          </div>
        </a>
        <div id='submenu2' class="collapse sidebar-submenu show">
        <a href="{{route('profile.pemacakan')}}" class="list-group-item list-group-item-action ">
            <span class="menu-collapsed">Kiriman pemacakan anda</span>
        </a>
        <a href="{{route('profile.permintaanPemacakan')}}" class="list-group-item list-group-item-action ">
            <span class="menu-collapsed">Permintaan pemacakan masuk</span>
        </a>
        <a href="{{route('profile.pengajuanPemacakan')}}" class="list-group-item list-group-item-action ">
            <span class="menu-collapsed">Pengajuan pemacakan terkirim </span>
        </a>
      </div>
    </div>
</div>

<script>
    function confirmDelete(item_id) {
            swal({
                 title: 'Apakah Anda Yakin?',
                  text: "Anda Tidak Akan Dapat Mengembalikannya!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+item_id).submit();
                    } else {
                        swal("Cancelled Successfully");
                    }
                });
        }
// Hide submenus
// $('#body-row .collapse').collapse('hide'); 

// // Collapse/Expand icon
// $('#collapse-icon').addClass('fa-angle-double-left'); 

// // Collapse click
// $('[data-toggle=sidebar-colapse]').click(function() {
//     SidebarCollapse();
// });

// function SidebarCollapse () {
//     $('.menu-collapsed').toggleClass('d-none');
//     $('.sidebar-submenu').toggleClass('d-none');
//     $('.submenu-icon').toggleClass('d-none');
//     $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
//     // Treating d-flex/d-none on separators with title
//     var SeparatorTitle = $('.sidebar-separator-title');
//     if ( SeparatorTitle.hasClass('d-flex') ) {
//         SeparatorTitle.removeClass('d-flex');
//     } else {
//         SeparatorTitle.addClass('d-flex');
//     }
    
//     // Collapse/Expand icon
//     $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
// }
    </script>
