@props(["nom" ,"prenom", "numero_client" ,"id" ,"numero_cin" , "created_at"])

<tr>

    <td><a class="box" href="{{route("editShow" ,$id)}}">{{$id}}</a></td>
    <td><a class="box" href="{{route("editShow" ,$id)}}">{{$numero_client}}</a> </td>
    <td><a class="box" href="{{route("editShow" ,$id)}}">{{$prenom}}</a></td>
    <td><a class="box" href="{{route("editShow" ,$id)}}">{{$nom}}</a></td>
    <td><a class="box" href="{{route("editShow" ,$id)}}">{{($created_at)}}</a> </td>
    <td><a class="box" href="{{route("editShow" ,$id)}}">{{$numero_cin}}</a> </td>
</tr>