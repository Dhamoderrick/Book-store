<script setup lang="ts">
import { BookInterface } from "@/types/book";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps<{
    book: BookInterface;
}>();

const form = useForm({
    title: "",
    author: "",
    image: null,
    isbn: "",
    genre: "",
    published_at: "",
    publisher: "",
    description: "",
});

const handleFormSubmit = () => {
    form.post(route("admin.books.store"), {
        forceFormData: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <Head title="Books" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Books
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <div
                        v-if="form.recentlySuccessful"
                        class="text-sm bg-green-100 p-3 w-full text-green-600"
                    >
                        Saved.
                    </div>
                </Transition>
                <div class="rounded-lg bg-white p-5">
                    <form @submit.prevent="handleFormSubmit" method="post">
                        <div class="grid grid-cols-2 gap-3 gap-y-6">
                            <div>
                                <InputLabel for="title" value="Title" />

                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                    autocomplete="Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>
                            <div>
                                <InputLabel for="author" value="Author" />

                                <TextInput
                                    id="author"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.author"
                                    required
                                    autofocus
                                    autocomplete="author"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.author"
                                />
                            </div>
                            <div>
                                <InputLabel for="isbn" value="ISBN" />

                                <TextInput
                                    id="isbn"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.isbn"
                                    required
                                    autofocus
                                    autocomplete="isbn"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.isbn"
                                />
                            </div>
                            <div>
                                <InputLabel for="genre" value="Genre" />

                                <TextInput
                                    id="genre"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.genre"
                                    required
                                    autofocus
                                    autocomplete="genre"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.genre"
                                />
                            </div>
                            <div>
                                <InputLabel for="publisher" value="Publisher" />

                                <TextInput
                                    id="publisher"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.publisher"
                                    required
                                    autofocus
                                    autocomplete="publisher"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.publisher"
                                />
                            </div>
                            <div>
                                <InputLabel
                                    for="published_at"
                                    value="Published At"
                                />

                                <TextInput
                                    id="published_at"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.published_at"
                                    required
                                    autofocus
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.published_at"
                                />
                            </div>
                            <div>
                                <InputLabel for="image" value="Image" />
                                <input
                                    type="file"
                                    @input="form.image = $event.target.files[0]"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.image"
                                />
                            </div>
                        </div>
                        <div class="mt-6">
                            <InputLabel for="description" value="Description" />
                            <textarea
                                name="description"
                                id="dscription"
                                class="w-full rounded-md mt-2"
                                cols="30"
                                rows="5"
                                v-model="form.description"
                            ></textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.description"
                            />
                        </div>

                        <PrimaryButton>Create</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
