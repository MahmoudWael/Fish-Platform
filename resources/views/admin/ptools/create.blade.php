@extends('admin.layouts.app')
@section('title') {{ $buy ?? $ptool->buy_request ?? false ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="form farms">
    <div class="container">
        <h2 class="section-title">
            سوق مستلزمات الانتاج : {{ $buy ?? $ptool->buy_request ?? false ? 'طلب شراء' : 'عرض بيع' }}
        </h2>
        @include('layouts.alert')

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                {!!
                    Form::open([
                        'method' => isset($ptool) ? 'PUT' : 'POST', 'files' => true,
                        'route' => isset($ptool) ? ['admin.ptools.update', $ptool] : 'admin.ptools.store',
                    ])
                !!}
                    {!! Form::hidden(
                        'buy_request', $buy ?? $ptool->buy_request ?? null, ['class' => 'form-control']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <h4><b>بيانات العارض</b></h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('provider', 'الجهة / الاسم') !!}
                                {!! Form::text('provider', $market->provider ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'اسم العارض') !!}
                                {!! Form::text('name', $market->name ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'انجليزى') !!}
                                {!! Form::text(null, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('mobile', 'موبايل العارض') !!}
                                {!! Form::text('mobile', $market->mobile ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('email', 'الايميل') !!}
                                {!! Form::email('email', $market->email ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('fax', 'الفاكس') !!}
                                {!! Form::text('fax', $market->fax ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('startDate', 'بداية العرض') !!}
                                {!! Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('endDate', 'نهاية العرض') !!}
                                {!! Form::date('endDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><b>بيانات المنتج</b></h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('type', 'المنتج') !!}
                                {!! Form::select(
                                        'type',
                                        $types->prepend('من فضلك اختار', 0),
                                        $ptool->type ?? null,
                                        ['class' => 'form-control']
                                    ) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                {!! Form::label('name', 'الاسم') !!}
                                {!! Form::text('name', $ptool->name ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('amount', 'الكمية') !!}
                                {!! Form::text('amount', $ptool->amount ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('startDate', 'بداية العرض') !!}
                                {!! Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('endDate', 'نهاية العرض') !!}
                                {!! Form::date('endDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'الوصف') !!}
                                {!! Form::textarea(
                                    'description', $ptool->description ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('photo', 'صورة المنتج') !!}
                                {!! Form::file('photo', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><b>بيانات التوريد</b></h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('place', 'مكان تسليم المحصول') !!}
                                <label>{!! Form::radio('place', 0, false) !!}باب المزرعة</label>
                                <label>{!! Form::radio('place', 1, false) !!}مقر المشترى</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
                                {!! Form::select(
                                        'Governorate_ID',
                                        $governorates->prepend('من فضلك اختار', 0),
                                        null,
                                        ['class' => 'form-control Governorate_ID', 'data-url' => url('/localities')]
                                    ) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Locality_ID', '(*)مركز') !!}
                                {!! Form::select('Locality_ID', ['من فضلك اختار'], null, [
                                    'class' => 'form-control Locality_ID', 'data-url' => url('/villages')]) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Village_ID', 'قرية') !!}
                                {!! Form::select(
                                    'Village_ID', ['من فضلك اختار'], null, ['class' => 'form-control Village_ID']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('transport', 'نوع النقل') !!}
                                <label>{!! Form::radio('transport', 0, false) !!}عادى</label>
                                <label>{!! Form::radio('transport', 1, false) !!}مبرد</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('avarage', 'معدل التوريد') !!}
                                <label>{!! Form::radio('avarage', 'يومي', false) !!}يومى</label>
                                <label>{!! Form::radio('avarage', 'اسبوعي', false) !!}اسبوعي</label>
                                <label>{!! Form::radio('avarage', 'شهري', false) !!}شهري</label>
                                <label>{!! Form::radio('avarage', 'أخرى', false) !!}أخرى</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('price', 'السعر المقترح') !!}
                                {!! Form::text('price', $market->price ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('price', 'انجليزى') !!}
                                {!! Form::text(null, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('payment', 'طريقة الدفع') !!}
                                {!! Form::text('payment', $market->payment ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('payment', 'انجليزى') !!}
                                {!! Form::text(null, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('more', 'تفاصيل أخرى') !!}
                                {!! Form::text('more', $market->more ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('more', 'انجليزى') !!}
                                {!! Form::text(null, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
