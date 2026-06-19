<h1>Nuevo Estado</h1>

<form action="{{ route('estados.store') }}" method="POST">
    @csrf

    <input
        type="text"
        name="nombre"
        placeholder="Nombre del estado">

    <button type="submit">
        Guardar
    </button>
</form>