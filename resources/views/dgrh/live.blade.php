@extends('dgrh.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
@role('admin')
 <form action="{{ url('meeting/store') }}" method="post" accept-charset="utf-8" class="mb-lg-3">
                               {{ csrf_field() }}



             <select name="name" id="name"  class="form-control" >
                        
             <option value="DGRHFS">إجتماع مع الإطارات المركزية </option>
             <option value="WILAYA">إجتماع مع إطارات الولاية </option>
                    
            </select>
 <button type="submit"  id="" class="btn btn-primary">إنشاء قاعة إجتماعات</button>                                
    </form> 
@endrole
          
     <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">نظام التخاطب عن بعد</h4>
                  <p class="card-category">إجتماعات الجماعات المحلية</p>
                </div>
                <div class="card-body table-responsive">
                       @if(isset($meetings))               
                    @if (count($meetings) >= 1)
                  <table class="table table-hover">
                 
                    <thead class="text-info">
                      <th>إسم القاعة</th>
                       <th>عدد الحضور</th>  
                      <th>الدخول للقاعة</th>
                    </thead>
                    <tbody>
             
                    @foreach($meetings as $meeting)
                      <tr>
                        <td>{!! $meeting->meetingName !!}</td>
                         <td>{!! $meeting->participantCount !!}</td>  
                        <td>
 @hasanyrole('miclat|wilaya')      
<form action="{{ url('/meeting/join') }}" method="post" enctype="multipart/form-data" target="_blank">
                                        {{ csrf_field() }}
        <input type="hidden" name="meetingID" value="{!! $meeting->meetingID !!}">
        <input type="hidden" name="meetingName" value="{!! auth()->user()->fullname !!}">
        <input type="hidden" name="password" value="Admin@2030">

        <div class="form-group">
            <button type="submit" name="submit" class="text-danger text-center" >
                                               <span class="material-icons">
                                wifi_tethering
                                </span>
         </button>
        </div>
    </form>
@endhasanyrole
@can('View Live Admin')
    <form action="{{ url('/meeting/join') }}" method="post" enctype="multipart/form-data"  target="_blank">
                                        {{ csrf_field() }}
        <input type="hidden" name="meetingID" value="{!! $meeting->meetingID !!}">
        <input type="hidden" name="meetingName" value="{!! auth()->user()->fullname !!}">
        <input type="hidden" name="password" value="MICLAT@2020">

        <div class="form-group">
            <button type="submit" name="submit" class="text-danger text-center" >
                                               <span class="material-icons">
                                wifi_tethering
                                </span>
         </button>
        </div>
    </form>
@endcan

                        </td>
                      </tr>
        @endforeach
        
            
       
      
                    </tbody>
                  </table>
                    @endif
         
            @else
            <h3 class="text-center text-danger">لايوجد أي إجتماع حاليا</h3>
            @endif
                </div>
              </div>

        </div>
    </div>
</div>
@endsection
