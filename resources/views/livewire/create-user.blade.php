
<div class="card">

                <div class="card-header card-header-info text-right">
                  <h4 class="card-title">إضافة مستخدم</h4>
                  <p class="card-category">إضافة مستغدم مع تحديد المجموعة</p>
                </div>
                <div class="card-body">
                  <form wire:submit.prevent="store">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="name">إسم المستخدم</label>
                          <input type="text" wire:model.lazy="name" class="form-control"  id="name">
                            @error('name') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror

                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">البريد الإلكتروني</label>
                          <input type="email" wire:model.lazy="email" class="form-control">
                           @error('email') <label id="email-error" class="error" for="email">{{ $message }}</label> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">الإسم</label>
                          <input type="text" wire:model.lazy="first_name" class="form-control">
                           @error('first_name') <label id="first_name-error" class="error" for="first_name">{{ $message }}</label> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">اللقب</label>
                          <input type="text" wire:model.lazy="last_name" class="form-control">
                           @error('last_name') <label id="last_name-error" class="error" for="last_name">{{ $message }}</label> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">رقم الهاتف</label>
                          <input type="text" wire:model.lazy="mobile" class="form-control">
                           @error('mobile') <label id="mobile-error" class="error" for="mobile">{{ $message }}</label> @enderror
                        </div>
                      </div>

                         <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">الرتبة</label>
                          <input type="text" wire:model.lazy="grade" class="form-control">
                          @error('grade') <label id="grade-error" class="error" for="grade">{{ $message }}</label> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <select wire:model="w" class="form-control">
                              <option value="" class="bmd-label-floating">الولاية</option>
                             @foreach ($wilaya as $w )
                                 <option  value="{!! $w->id !!}"  >{!! $w->name !!}</option>
                             @endforeach

                          </select>

                        </div>
                      </div>
                      <div class="col-md-6">
                           <div class="form-group">
                          <select wire:model="r" class="form-control">
                              <option value="" class="bmd-label-floating">المجموعة</option>
                              @foreach ($role as $r )
                                 <option value="{!! $r->id !!}" >{!! $r->name !!}</option>
                             @endforeach
                          </select>
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">كلمة المرور</label>
                          <input type="password" wire:model.lazy="password" class="form-control">
                        </div>

                      </div>
                         <div class="col-md-6">
                         <div class="form-group">
                          <label class="bmd-label-floating">تأكيد كلمة المرور</label>
                          <input type="password" wire:model.lazy="password" class="form-control">
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">إضافة</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

