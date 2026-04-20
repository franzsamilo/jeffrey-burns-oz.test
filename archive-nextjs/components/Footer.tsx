import Link from "next/link";
import { PHONE_NUMBER, PHONE_HREF, footerContent } from "@/lib/constants";

export default function Footer() {
  return (
    <footer id="contact" className="bg-charcoal text-white py-16 relative overflow-hidden">
      {/* Subtle teal glow */}
      <div className="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[200px] bg-teal/[0.03] rounded-full blur-[100px] pointer-events-none" />

      <div className="max-w-[1200px] mx-auto px-6 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
          {/* Brand */}
          <div>
            <Link href="/" className="inline-block mb-4 group">
              <span className="font-[family-name:var(--font-playfair)] text-2xl font-bold tracking-[0.04em] group-hover:text-teal-light transition-colors duration-300">
                j burns
              </span>
              <span className="block font-[family-name:var(--font-montserrat)] text-[9px] uppercase tracking-[0.25em] text-white/50">
                Jeffrey S. Burns D.D.S.
              </span>
            </Link>
            <p className="font-[family-name:var(--font-dancing-script)] text-xl text-teal-light/80 mt-2">
              DreamSmile
            </p>
            <p className="text-sm text-white/40 mt-2">
              {footerContent.tagline}
            </p>
          </div>

          {/* Contact */}
          <div>
            <h4 className="font-[family-name:var(--font-montserrat)] text-[10px] font-bold uppercase tracking-[0.2em] text-teal mb-5">
              Contact
            </h4>
            <div className="space-y-2.5 text-sm text-white/60">
              <p>{footerContent.address}</p>
              <p>
                <Link
                  href={PHONE_HREF}
                  className="hover:text-teal transition-colors duration-200"
                >
                  {PHONE_NUMBER}
                </Link>
              </p>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="font-[family-name:var(--font-montserrat)] text-[10px] font-bold uppercase tracking-[0.2em] text-teal mb-5">
              Quick Links
            </h4>
            <div className="space-y-2.5 text-sm text-white/60">
              <p>
                <Link
                  href="#quiz"
                  className="hover:text-teal transition-colors duration-200 inline-flex items-center gap-1.5 group"
                >
                  Am I a Candidate?
                  <svg className="w-3 h-3 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                  </svg>
                </Link>
              </p>
              <p>
                <Link
                  href="#services"
                  className="hover:text-teal transition-colors duration-200 inline-flex items-center gap-1.5 group"
                >
                  Services
                  <svg className="w-3 h-3 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                  </svg>
                </Link>
              </p>
              <p>
                <Link
                  href="#about"
                  className="hover:text-teal transition-colors duration-200 inline-flex items-center gap-1.5 group"
                >
                  About Dr. Burns
                  <svg className="w-3 h-3 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                  </svg>
                </Link>
              </p>
            </div>
          </div>
        </div>

        <div className="border-t border-white/[0.06] mt-12 pt-8 text-center text-xs text-white/30">
          {footerContent.copyright}
        </div>
      </div>
    </footer>
  );
}
