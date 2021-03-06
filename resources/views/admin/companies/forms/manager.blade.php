<div class="row farms">
    {!! Form::open([
            'route' => ['admin.' . requestUri() . '.addManager', $company ?? session('company')],
            'class' => 'managers'
        ]) !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EmpName', '(*)الاســـم') !!}
                {!! Form::text('EmpName', null, ['class' => 'form-control EmpName']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Job', '(*)المنصب') !!}
                {!! Form::text('Job', null, ['class' => 'form-control Job']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Mob', '(*)موبايل') !!}
                {!! Form::text('Mob', null, ['class' => 'form-control Mob']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Email', 'بريد الالكترونى') !!}
                {!! Form::text('Email', null, ['class' => 'form-control Email']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary save']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ واستمرار', ['class' => 'btn btn-default next']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>الاســــم</th>
                    <th>الوظيفة</th>
                    <th>الموبايل</th>
                    <th>بريد الالكترونى</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($company->managers ?? session('company')->managers ?? [] as $manager)
                    <tr>
                        <td>{{ $manager->FishCompany_Mangr_ID }}</td>
                        <td>{{ $manager->EmpName }}</td>
                        <td>{{ $manager->Job }}</td>
                        <td>{{ $manager->Mob }}</td>
                        <td>{{ $manager->Email }}</td>
                        <td>
                            <a href="{{ route('admin.managers.edit', $manager) }}"
                                data-action="{{ route('admin.managers.update', $manager) }}"
                                data-form="managers" class="btn btn-sm btn-primary edit">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.managers.destroy', $manager]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">لا توجد نتائج لعرضها</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
