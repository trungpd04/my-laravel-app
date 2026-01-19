<x-layout>
    <h1>Create Product</h1>
    <form action="/product/create" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="number" name="price" placeholder="Price">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="text" name="image" placeholder="Image">
        <input type="number" name="category_id" placeholder="Category ID">
        <button type="submit">Create</button>
    </form>
</x-layout>