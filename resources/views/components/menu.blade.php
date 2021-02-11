<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    {{ $active }} <br />
    {{ $nama }}
    @foreach ($list as $row)
        {{ $row }}
    @endforeach
</div>
