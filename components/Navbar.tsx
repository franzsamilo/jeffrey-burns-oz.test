"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import { PHONE_NUMBER, PHONE_HREF } from "@/lib/constants";

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false);
  const [mobileOpen, setMobileOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 50);
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <nav
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        scrolled ? "bg-white shadow-md" : "bg-transparent"
      }`}
    >
      <div className="max-w-[1200px] mx-auto px-6 flex items-center justify-between h-20">
        {/* Logo */}
        <Link href="/" className="flex flex-col leading-tight">
          <span
            className={`font-[family-name:var(--font-playfair)] text-2xl font-bold tracking-wide transition-colors ${
              scrolled ? "text-charcoal" : "text-white"
            }`}
          >
            j burns
          </span>
          <span
            className={`font-[family-name:var(--font-montserrat)] text-[10px] uppercase tracking-widest transition-colors ${
              scrolled ? "text-warm-gray" : "text-white/70"
            }`}
          >
            Jeffrey S. Burns D.D.S.
          </span>
        </Link>

        {/* Desktop CTA */}
        <div className="hidden md:block">
          <Button
            variant="outlined"
            href={PHONE_HREF}
            className={
              scrolled
                ? ""
                : "border-white text-white hover:bg-white hover:text-charcoal"
            }
          >
            Call Us {PHONE_NUMBER}
          </Button>
        </div>

        {/* Mobile hamburger */}
        <button
          className="md:hidden flex flex-col gap-1.5 p-2"
          onClick={() => setMobileOpen(!mobileOpen)}
          aria-label="Toggle navigation menu"
        >
          {[0, 1, 2].map((i) => (
            <span
              key={i}
              className={`block w-6 h-0.5 transition-colors ${
                scrolled ? "bg-charcoal" : "bg-white"
              }`}
            />
          ))}
        </button>
      </div>

      {/* Mobile menu */}
      {mobileOpen && (
        <motion.div
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          className="md:hidden bg-white shadow-lg px-6 py-4"
        >
          <Button variant="solid" href={PHONE_HREF} className="w-full">
            Call Us {PHONE_NUMBER}
          </Button>
        </motion.div>
      )}
    </nav>
  );
}
