import React from "react";

/**
 * Hero section
 * with a background image
 * overflow hidden
 * top text and button
 */
const HeroSection: React.FC = () => {
    return (
        <section
            className="relative w-full h-[60vh] bg-cover bg-center overflow-hidden flex items-center justify-center text-center text-white object-cover"
            style={{ backgroundImage: "url('/pict_original.jpg')" }}
        >
            <div className="bg-black bg-opacity-50 p-8 rounded-lg">
                <h1 className="text-5xl font-bold">Make a Difference Today</h1>
                <p className="mt-4 text-lg">
                    Your contribution can bring hope and change lives.
                </p>
                <button className="mt-6 px-6 py-3 bg-blue-600 text-white text-lg rounded-lg shadow hover:bg-blue-700">
                    Donate Now
                </button>
            </div>
        </section>
    );
};

export default HeroSection;
