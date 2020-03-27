<div>
<button  wire:click="showForm"  class="btn btn-info btn-lg btn-round"><i class="material-icons">person_add</i>    إضافة مستخدم</button>

@if($isclickAdd)
     @if($updateMode)
     @include('livewire.update-user')
    @else
          @include('livewire.create-user')

    @endif
@endif

              <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">المجموعات</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#admin" data-toggle="tab" wire:ignore>
                            <i class="material-icons">settings</i> Admin
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#miclat" data-toggle="tab" wire:ignore>
                            <i class="material-icons">account_balance</i> MICLAT
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#wilaya" data-toggle="tab" wire:ignore>
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

                    <div class="tab-pane active" id="admin" wire:key="admin">
                      <table class="table">
                        <tbody>
                          @foreach ($user as$u)
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

                    <div class="tab-pane" id="miclat" wire:key="miclat">
                      <table class="table">
                        <tbody>
                         @foreach ($user as$u)
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
                    <div class="tab-pane" id="wilaya" wire:key="wilaya">
                      <table class="table">
                        <tbody>
                          @foreach ($user as$u)
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
                  </div>
                </div>
              </div>
</div>
