        <table>
            <tr>
                <th>Год релиза</th>
                <th>Обложка</th>
                <th>Название</th>
                <th>Исполнитель</th>
                <th>Общее время</th>
                <th>Лейбл</th>
            </tr>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->year }}</td>
                <td>
                    @include('includes.image')
                </td>
                <td><a href="{{ route('albums.show', $album->id) }}">{{ $album->title }}</a></td>
                <td>{{ $album->artist }}</td>
                <td>{{ $album->total_time }}</td>
                <td>{{ $album->label }}</td>
            </tr>
            @endforeach
        </table>
        