<table id="example-datatable" class="table table-striped table-bordered table-vcenter">
    <thead>
        <tr>
            <th class="text-center" style="width: 50px;">No</th>
            <th>Username</th>
            <th>Nama Petugas</th>
            <th>Level Akun</th>
            <th class="text-center" style="width: 100px;"><i class="fa fa-flash"></i></th>
        </tr>
    </thead>
    <tbody id="isitabel">
        @php
            $nomer=1;
        @endphp
        @foreach($data as $value)
            <tr>
                <td>{{$nomer++}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->nama_petugas}}</td>
                <td>{{$value->level}}</td>
                <td>
                    <button class="btn btn-success" onclick="editdata({{$value->id}})">
                        <i class="fa fa-wrench"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>