<script setup lang="ts">
import { PaginationInterface, BookInterface } from "@/types/book";
import Pagination from "@/Components/Pagination.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps<{
    books: PaginationInterface & {
        data: Array<BookInterface>;
    };
    filter: {
        search: string;
    };
}>();
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
                <div class="flex justify-end mb-4">
                    <Link :href="route('admin.books.create')">
                        <PrimaryButton>Add New</PrimaryButton>
                    </Link>
                </div>

                <div
                    class="overflow-x-auto rounded-lg border bg-white border-gray-200"
                >
                    <table
                        class="min-w-full divide-y-2 divide-gray-200 text-sm"
                    >
                        <thead class="ltr:text-left rtl:text-right bg-gray-50">
                            <tr class="text-left">
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    Title
                                </th>
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    Author
                                </th>
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    Genre
                                </th>
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    ISBN
                                </th>
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    Published on
                                </th>
                                <th
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                >
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="(book, key) in books.data" :key="key">
                                <td
                                    class="whitespace-nowrap px-4 py-4 font-medium text-gray-900"
                                >
                                    {{ book?.title }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-4 py-4 font-medium text-gray-700"
                                >
                                    {{ book?.author }}
                                </td>

                                <td
                                    class="whitespace-nowrap px-4 py-4 text-gray-700"
                                >
                                    {{ book?.genre }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-4 py-4 text-gray-700"
                                >
                                    {{ book?.isbn }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-4 py-4 text-gray-700"
                                >
                                    {{ book?.published_at }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-4 py-4 text-gray-700"
                                >
                                    <div class="flex items-center gap-3">
                                        <Link
                                            :href="
                                                route(
                                                    'admin.books.edit',
                                                    book.id
                                                )
                                            "
                                            class="h-8 w-8 flex justify-center items-center hover:bg-gray-100 rounded-full"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-4 h-4"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                />
                                            </svg>
                                        </Link>

                                        <Link
                                            :href="
                                                route(
                                                    'admin.books.destroy',
                                                    book.id
                                                )
                                            "
                                            method="delete"
                                            class="h-8 w-8 flex justify-center items-center group hover:bg-red-100 rounded-full"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-4 h-4 group-hover:text-red-500"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination v-if="books?.data" :pagination="books" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
