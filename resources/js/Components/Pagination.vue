<template>
    <div
        class="hidden my-3 sm:flex sm:flex-1 sm:items-center sm:justify-between"
    >
        <div>
            <p class="text-sm text-gray-700">
                Showing
                {{ " " }}
                <span class="font-medium">{{ pagination?.from }}</span>
                {{ " " }}
                to
                {{ " " }}
                <span class="font-medium">{{ pagination?.to }}</span>
                {{ " " }}
                of
                {{ " " }}
                <span class="font-medium">{{ pagination.total }}</span>
                {{ " " }}
                results
            </p>
        </div>
        <div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                <Link
                    v-for="(link, key) in pagination?.links"
                    :href="link.url"
                    aria-current="page"
                    class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20 text-slate-700"
                    ><span v-html="link.label"></span
                ></Link>
            </nav>
        </div>
    </div>
</template>
<script setup lang="ts">
import { PaginationInterface } from "@/types/book";
import { Link } from "@inertiajs/vue3";
defineProps<{
    pagination: PaginationInterface;
}>();
</script>
