export interface BookInterface {
    title: string;
    author: string;
    genre: string;
    isbn: string;
    published_at: Date;
    publisher: string;
    image: string;
    description: string
}

export interface PaginationInterface {
    current_page: number;
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string
    links:Array<{
        active: boolean;
        label: string;
        url: string
    }>;
    next_page_url: null | string;
    path: string;
    per_page: string;
    prev_page_url:null | string;
    to: number;
    total: number;
}