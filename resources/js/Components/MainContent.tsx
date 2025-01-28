import { Link } from "@inertiajs/react";

// components/MainContent.tsx
export default function MainContent() {
    return (
        <main className="flex flex-col items-center text-center py-16 px-4 ">
            <h2 className="text-4xl font-bold text-gray-800">
                Make a Difference Today
            </h2>
            <p className="mt-4 text-lg text-gray-600">
                Your donation can change lives and bring hope to those in need.
            </p>
            <Link
                href="/donate"
                className="mt-6 px-6 py-3 bg-blue-600 text-white text-lg rounded-lg shadow hover:bg-blue-700"
            >
                Donate Now
            </Link>
        </main>
    );
}
