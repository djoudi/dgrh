<div>
    
    

<div class="card">

                <div class="card-header card-header-info text-right">
                  <h4 class="card-title">تغيير كلمة المرور</h4>
                </div>
                <div class="card-body">
                  <form wire:submit.prevent="update()">
                  <input type="hidden" wire:model="sid">
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
                    <button type="submit" class="btn btn-primary pull-right">تغيير </button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>





</div>
