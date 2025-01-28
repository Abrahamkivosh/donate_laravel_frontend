import { Link } from "@inertiajs/react";

// components/Footer.tsx
export default function Footer() {
    return (
        <footer className="bg-blue-700 text-white p-10 ">
            <div className="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                <div>
                    <h3 className="text-2xl font-bold">Charity Fund</h3>
                    <p className="mt-2 text-gray-300">
                        Helping those in need through your generous donations.
                    </p>
                </div>
                <div>
                    <h4 className="text-xl font-semibold">Quick Links</h4>
                    <ul className="mt-2 space-y-2">
                        <li>
                            <Link href="/" className="hover:text-gray-300">
                                Home
                            </Link>
                        </li>
                        <li>
                            <Link href="/about" className="hover:text-gray-300">
                                About
                            </Link>
                        </li>
                        <li>
                            <Link
                                href="/donate"
                                className="hover:text-gray-300"
                            >
                                Donate
                            </Link>
                        </li>
                        <li>
                            <Link
                                href="/contact"
                                className="hover:text-gray-300"
                            >
                                Contact
                            </Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 className="text-xl font-semibold">Connect With Us</h4>
                    <div className="flex justify-center md:justify-start space-x-4 mt-2">
                        <Link href="#" className="hover:text-gray-300">
                            Facebook
                        </Link>
                        <Link href="#" className="hover:text-gray-300">
                            Twitter
                        </Link>
                        <Link href="#" className="hover:text-gray-300">
                            Instagram
                        </Link>
                    </div>
                </div>
            </div>
            <div className="mt-6 text-center border-t border-gray-500 pt-4">
                <p>
                    &copy; {new Date().getFullYear()} Charity Fund. All rights
                    reserved.
                </p>
            </div>
        </footer>
    );
}
