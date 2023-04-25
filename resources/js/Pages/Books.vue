<script setup lang="ts">
import { PaginationInterface, BookInterface } from "@/types/book";
import Pagination from "@/Components/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "@/Utils/utils";

const props = defineProps<{
    books: PaginationInterface & {
        data: Array<BookInterface>;
    };
    filter: {
        search: string;
    };
}>();

const search = ref(props.filter?.search);

watch(
    search,
    debounce(() => {
        router.get(
            "/",
            { search: search.value },
            {
                preserveState: true,
                replace: false,
            }
        );
    }, 500)
);
</script>
<template>
    <div class="p-8 max-w-7xl mx-auto">
        <div class="my-3">
            <input
                v-model="search"
                type="search"
                class="rounded"
                placeholder="Search"
            />
        </div>
        <div class="grid grid-cols-4 gap-4 gap-y-6">
            <a
                href="#"
                class="block group"
                v-for="(book, key) in books.data"
                :key="key"
            >
                <img
                    :src="book.image"
                    alt="book thumbnail"
                    class="aspect-square w-full object-cover"
                />

                <div class="mt-1.5">
                    <div class="relative bg-white pt-3">
                        <h3
                            class="text-base text-gray-700 group-hover:underline group-hover:underline-offset-4"
                        >
                            {{ book?.title }}
                        </h3>

                        <div
                            class="mt-1.5 flex items-center justify-between text-gray-900"
                        >
                            <p class="tracking-wide text-sm text-gray-500">
                                By {{ book?.author }}
                            </p>

                            <p class="text-xs uppercase tracking-wide">
                                {{ book?.genre }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
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
                            Publisher
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

                        <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                            {{ book?.genre }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                            {{ book?.isbn }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-4 text-gray-700">
                            {{ book?.published_at }}
                        </td>
                        <td
                            class="whitespace-nowrap px-4 py-4 font-medium text-gray-700"
                        >
                            {{ book?.publisher }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
        <Pagination :pagination="books" />
    </div>
</template>
