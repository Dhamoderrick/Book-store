<script setup lang="ts">
import { BookInterface } from "@/types/book";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
    book: BookInterface;
}>();
</script>
<template>
    <section class="p-8 max-w-7xl mx-auto">
        <div class="relative mx-auto max-w-screen-xl px-4 py-8">
            <Link :href="route('books')" class="mb-4 inline-block"> Back</Link>

            <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
                    <img
                        alt="Les Paul"
                        :src="book.image"
                        class="aspect-square w-full rounded-xl object-cover"
                    />
                </div>

                <div class="sticky top-0">
                    <div class="mt-8 flex justify-between">
                        <div class="max-w-[35ch] space-y-2">
                            <h1 class="text-xl font-bold sm:text-2xl">
                                {{ book?.title }}
                            </h1>

                            <div class="-ms-0.5 flex">
                                <svg
                                    class="h-5 w-5 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>

                                <svg
                                    class="h-5 w-5 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>

                                <svg
                                    class="h-5 w-5 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>

                                <svg
                                    class="h-5 w-5 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>

                                <svg
                                    class="h-5 w-5 text-gray-200"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="prose max-w-none">
                            <p>
                                {{ book?.description }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex items-center gap-4">
                            <fieldset>
                                <legend class="mb-1 text-sm font-medium">
                                    Author
                                </legend>

                                <div class="flex flex-wrap gap-1">
                                    <h3
                                        class="group inline-block py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                                    >
                                        {{ book?.author }}
                                    </h3>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="mb-1 text-sm font-medium">
                                    ISBN
                                </legend>

                                <div class="flex flex-wrap gap-1">
                                    <h3
                                        class="group inline-block py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                                    >
                                        {{ book?.isbn }}
                                    </h3>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="mb-1 text-sm font-medium">
                                    Published At
                                </legend>

                                <div class="flex flex-wrap gap-1">
                                    <h3
                                        class="group inline-block py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                                    >
                                        {{ book?.published_at }}
                                    </h3>
                                </div>
                            </fieldset>
                        </div>

                        <fieldset class="mt-4">
                            <legend class="mb-1 text-sm font-medium">
                                Genre
                            </legend>

                            <h3
                                class="group inline-block py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                            >
                                {{ book?.genre }}
                            </h3>
                        </fieldset>
                        <fieldset class="mt-4">
                            <legend class="mb-1 text-sm font-medium">
                                Publisher
                            </legend>

                            <h3
                                class="group inline-block py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white"
                            >
                                {{ book?.publisher }}
                            </h3>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
