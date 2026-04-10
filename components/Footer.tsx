import Link from "next/link";
import { PHONE_NUMBER, PHONE_HREF, footerContent } from "@/lib/constants";

export default function Footer() {
  return (
    <footer id="contact" className="bg-charcoal text-white py-16">
      <div className="max-w-[1200px] mx-auto px-6">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
          {/* Brand */}
          <div>
            <Link href="/" className="inline-block mb-4">
              <span className="font-[family-name:var(--font-playfair)] text-2xl font-bold">
                j burns
              </span>
              <span className="block font-[family-name:var(--font-montserrat)] text-[10px] uppercase tracking-widest text-white/60">
                Jeffrey S. Burns D.D.S.
              </span>
            </Link>
            <p className="font-[family-name:var(--font-dancing-script)] text-xl text-teal-light mt-2">
              DreamSmile
            </p>
            <p className="text-sm text-white/50 mt-2">
              {footerContent.tagline}
            </p>
          </div>

          {/* Contact */}
          <div>
            <h4 className="font-[family-name:var(--font-montserrat)] text-xs font-semibold uppercase tracking-widest text-teal mb-4">
              Contact
            </h4>
            <div className="space-y-2 text-sm text-white/70">
              <p>{footerContent.address}</p>
              <p>
                <Link
                  href={PHONE_HREF}
                  className="hover:text-teal transition-colors"
                >
                  {PHONE_NUMBER}
                </Link>
              </p>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="font-[family-name:var(--font-montserrat)] text-xs font-semibold uppercase tracking-widest text-teal mb-4">
              Quick Links
            </h4>
            <div className="space-y-2 text-sm text-white/70">
              <p>
                <Link
                  href="#quiz"
                  className="hover:text-teal transition-colors"
                >
                  Am I a Candidate?
                </Link>
              </p>
              <p>
                <Link
                  href="#services"
                  className="hover:text-teal transition-colors"
                >
                  Services
                </Link>
              </p>
              <p>
                <Link
                  href="#about"
                  className="hover:text-teal transition-colors"
                >
                  About Dr. Burns
                </Link>
              </p>
            </div>
          </div>
        </div>

        <div className="border-t border-white/10 mt-12 pt-8 text-center text-xs text-white/40">
          {footerContent.copyright}
        </div>
      </div>
    </footer>
  );
}
