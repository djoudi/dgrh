<div>
<button  wire:click="showForm"  class="btn btn-info btn-lg btn-round"><i class="material-icons">person_add</i>    إضافة مستخدم</button>

@if($isclickAdd)
     @if($updateMode)
     @include('livewire.update-user')
    @else
          @include('livewire.create-user')

    @endif
@endif

              <div class="card" wire:key="list-user">
                <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">المجموعات</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link {{ $user_role=="Admin" ? 'active':'' }}"  data-toggle="tab" wire:click="user_admin">
                            <i class="material-icons">settings</i> Admin
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ $user_role=="miclat" ? 'active':'' }}"  data-toggle="tab" wire:click="user_miclat">
                            <i class="material-icons">account_balance</i> MICLAT
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ $user_role=="wilaya" ? 'active':'' }}"  data-toggle="tab" wire:click="user_wilaya">
                            <i class="material-icons">location_city</i> WILAYA
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content" wire:key="tab">
               @if ($user_role=='Admin')
                    <div class="tab-pane {{ $user_role=="Admin" ? 'active':'' }}" id="admin" wire:key="admin">
                       <h3>Admin</h3>
                      <table class="table">
                        <tbody>
                          @foreach ($admin as$u)
                              <tr>

                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->mobile }}</td>
                            <td>{{ $u->wilaya->name }}</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task"
                              class="btn btn-primary btn-link btn-sm" >
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove"
                              class="btn btn-danger btn-link btn-sm"
                              onclick="confirm('هل أنت متأكد ؟') || event.stopImmediatePropagation()"
                              wire:click="destroy({{ $u->id }})"

                              >
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                @elseif ($user_role=='miclat')
                    <div class="tab-pane {{ $user_role=="miclat" ? 'active':'' }}" id="miclat" wire:key="miclat">
                       <h3>MICLAT</h3>
                      <table class="table">
                        <tbody>
                         @foreach ($miclat as$u)
                         
                              <tr>

                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->mobile }}</td>
                            <td>{{ $u->wilaya->name }}</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                @else
                     <div class="tab-pane {{ $user_role=="wilaya" ? 'active':'' }}" id="wilaya" wire:key="wilaya">
                         <h3>WILAYA</h3>
                      <table class="table">
                        <tbody>
                          @foreach ($wilayas as$u)
                              <tr>

                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->mobile }}</td>
                            <td>{{ $u->wilaya->name }}</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
               @endif




                   </div>  {{-- /card-body  --}}
                </div>   {{-- /card  --}}
              
</div>
