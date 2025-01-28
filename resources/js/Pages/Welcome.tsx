// components/Navbar.tsx
import { Link } from "@inertiajs/react";

// pages/Welcome.tsx
import { PageProps } from "@/types";
import { Head } from "@inertiajs/react";
import MainContent from "@/Components/MainContent";
import WebsiteLayout from "@/Layouts/WebsiteLayout";
import HeroSection from "@/Components/website/HeroSection";
import HomeAboutUs from "@/Components/website/HomeAboutUs";

export default function Welcome({ auth }: PageProps) {
    return (
        <>
            <WebsiteLayout>
                <Head title="Welcome to Charity Fund" />
                <HeroSection />
                <HomeAboutUs />
                {/* <MainContent /> */}
            </WebsiteLayout>
        </>
    );
}
