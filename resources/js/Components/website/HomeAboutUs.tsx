import { Link } from "@inertiajs/react";
import React from "react";

/**
 * HomeAboutUs
 * Two-grid layout
 * Left image, right text (title, description) > h2, p, and button to learn more directing to about us page
 * Great UI/UX for this section using Tailwind CSS
 * Added dummy text for title and description
 * Includes animations for the section and button
 */
const HomeAboutUs = () => {
    return (
        <section className="grid grid-cols-1 md:grid-cols-2 items-center gap-8 px-6 md:px-16 py-12 bg-gray-100 animate-fade-in">
            <div>
                <img
                    src="/about.jpeg"
                    alt="About Us"
                    className="w-full rounded-lg shadow-lg"
                />
            </div>
            <div className="space-y-6">
                <h2 className="text-4xl font-bold text-gray-800 text-left md:text-center">
                    Who We Are
                </h2>
                <p className="text-lg text-gray-600">
                    We are dedicated to making a positive impact in our
                    community by providing essential support and resources. Our
                    mission is to uplift and empower individuals through our
                    various programs and initiatives.
                </p>
                <div>
                    <Link
                        href="/about-us"
                        className="px-10 py-4 bg-blue-600 text-white text-lg rounded-full shadow-md hover:bg-blue-700 transition-transform transform hover:scale-105"
                    >
                        Learn More
                    </Link>
                </div>
            </div>
        </section>
    );
};

export default HomeAboutUs;
