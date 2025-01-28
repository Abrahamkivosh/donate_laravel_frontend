import { Link } from "@inertiajs/react";

export default function Navbar() {
    return (
        <nav className="bg-blue-600 text-white p-4 shadow-md">
            <div className="container mx-auto flex justify-between items-center">
                <h1 className="text-2xl font-bold">Charity Fund</h1>
                <ul className="flex space-x-6">
                    <li>
                        <Link href="/" className="hover:text-gray-200">
                            Home
                        </Link>
                    </li>
                    <li>
                        <Link href="/about" className="hover:text-gray-200">
                            About
                        </Link>
                    </li>
                    <li>
                        <Link href="/donate" className="hover:text-gray-200">
                            Donate
                        </Link>
                    </li>
                    <li>
                        <Link href="/contact" className="hover:text-gray-200">
                            Contact
                        </Link>
                    </li>
                </ul>
            </div>
        </nav>
    );
}
