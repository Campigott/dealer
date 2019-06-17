@extends('template')

@section('container')
    <div class="row">
        <div class="col-sm-8">
            <h1>
                Teste
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-8">
            Tabela Com pesquisa por PHP...


        <form action="{{url('/users/pesquisa')}}" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="class="col-sm-4">
                        <input type="text" name='name' class="form-control" placeholder="Nome">
                    </div>
                    <div class="class="col-sm-4">
                        <input type="email" name='email' class="form-control" placeholder="E-mail">
                    </div>
                    <div class="class="col-sm-4">
                        <select name='active' class="custom-select">
                            <option value="" selected>Selecione um Status</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Data Inicial:
                        <input type="Datetime" class="datepicker" name="dateFirst" value="12-05-2015 21:05" id="dateFirst">
                    </div>
                    <div class="col-sm-4">
                        Data Final:
                        <input type="Datetime" name="dateEnd" value="" id="dateEnd">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <b>Total por paginas:</b>
                        <select name='totalPages' class="custom-select">
                            @for ($i = 10; $i <= 100; $i+=10)
                                <option
                                    @if ($i == 10) {{ 'selected' }}  {{ '' }} @endif
                                 value="{{$i}}" >{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-sm-4">
                            <div class="col-sm-2">
                                Ordenação:
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="orderBy" id="OrderByAsc" value="asc" checked>
                                <label class="form-check-label" for="OrderByAsc">
                                    Crescente
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="orderBy" id="OrderByDesc" value="desc" >
                                <label class="form-check-label" for="OrderByDesc">
                                    Decrescente
                                </label>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">pesquisar</button>
                    </div>
                </div>
            </form>
            <form action="{{url('/users/pesquisa-topacess')}}" method="post">
                {{ csrf_field() }}
                <input hidden name="topAcess" value='Desc'>
                <div class="col">
                        <button type="submit" class="btn btn-primary">Mais Acessos</button>
                    </div>

            </form>

            <form action="{{url('/users/pesquisa-lessacess')}}" method="post">
                {{ csrf_field() }}
                <input hidden name="lessAcess" value='Asc'>
                <div class="col">
                        <button type="submit" class="btn btn-primary">Menos Acessos</button>
                    </div>

            </form>
        </div>
        <div class="col-sm-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ativo</th>
                        <th scope="col">Quantidade Login Blade:</th>
                        <th scope="col">Quantidade Login Php</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->active ? 'Ativo' : 'Inativo'}}
                                </td>
                                <td>
                                    {{$user->UserAcess->count()}}
                                </td>
                                <td>
                                    {{$user->user_acess_count}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @if (isset($usersDataForm))
                    {!! $users->appends($usersDataForm)->links() !!}
                @else
                    {!! $users->links() !!}
                @endif
        </div>
    </div>
@endsection

@section('script')
<script>

</script>
@endsection
