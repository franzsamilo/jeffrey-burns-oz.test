"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import SectionLabel from "@/components/ui/SectionLabel";
import { comparisonDreamSmile, comparisonChains } from "@/lib/constants";

export default function ComparisonSection() {
  return (
    <section className="py-20 md:py-24 bg-[#F5F5F3]">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-14"
        >
          <SectionLabel>SEE THE DIFFERENCE</SectionLabel>
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal mt-3">
            The{" "}
            <span className="font-[family-name:var(--font-dancing-script)] text-teal text-4xl md:text-5xl">
              DreamSmile
            </span>{" "}
            vs. Dental Chains
          </h2>
          <p className="text-warm-gray italic mt-3">
            Not all dental implant smiles are created equal.
          </p>
        </motion.div>

        {/* Comparison Cards */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 relative">
          {/* VS Divider — desktop only */}
          <div className="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 w-14 h-14 rounded-full bg-charcoal text-white items-center justify-center font-bold text-sm shadow-lg">
            VS
          </div>

          {/* DreamSmile Card */}
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5 }}
            className="bg-white rounded-xl p-8 shadow-md relative"
          >
            <div className="absolute -top-3 left-8">
              <span className="inline-block bg-teal text-white text-xs font-semibold uppercase tracking-widest px-4 py-1 rounded-full">
                RECOMMENDED
              </span>
            </div>
            <h3 className="font-[family-name:var(--font-dancing-script)] text-2xl text-teal mb-1 mt-2">
              The DreamSmile
            </h3>
            <p className="text-xs uppercase tracking-widest text-warm-gray font-semibold mb-6">
              THE DR. BURNS EXPERIENCE
            </p>
            <div className="space-y-5">
              {comparisonDreamSmile.map((item, i) => (
                <div key={i} className="flex items-start gap-3">
                  <div className="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-teal flex items-center justify-center">
                    <svg
                      className="w-3.5 h-3.5 text-white"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      strokeWidth={3}
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                  </div>
                  <div>
                    <p className="font-semibold text-charcoal text-sm">
                      {item.title}
                    </p>
                    <p className="text-warm-gray text-xs mt-0.5">
                      {item.description}
                    </p>
                  </div>
                </div>
              ))}
            </div>
          </motion.div>

          {/* VS Divider — mobile only */}
          <div className="flex lg:hidden justify-center">
            <div className="w-14 h-14 rounded-full bg-charcoal text-white flex items-center justify-center font-bold text-sm shadow-lg">
              VS
            </div>
          </div>

          {/* Dental Chains Card */}
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5, delay: 0.1 }}
            className="bg-white/60 rounded-xl p-8 border border-gray-200"
          >
            <h3 className="font-[family-name:var(--font-montserrat)] text-lg font-bold text-warm-gray mb-1 mt-2">
              National Dental Chains
            </h3>
            <p className="text-xs uppercase tracking-widest text-warm-gray/70 font-semibold mb-6">
              THE TRADITIONAL EXPERIENCE
            </p>
            <div className="space-y-5">
              {comparisonChains.map((item, i) => (
                <div key={i} className="flex items-start gap-3">
                  <div className="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-red-muted flex items-center justify-center">
                    <svg
                      className="w-3.5 h-3.5 text-white"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      strokeWidth={3}
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                      />
                    </svg>
                  </div>
                  <div>
                    <p className="font-semibold text-charcoal text-sm">
                      {item.title}
                    </p>
                    <p className="text-warm-gray text-xs mt-0.5">
                      {item.description}
                    </p>
                  </div>
                </div>
              ))}
            </div>
          </motion.div>
        </div>

        {/* Bottom CTA */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.2 }}
          className="text-center mt-14"
        >
          <Button href="#quiz" className="w-full md:w-auto">
            SEE IF YOU&apos;RE ELIGIBLE FOR DENTAL IMPLANTS
          </Button>
        </motion.div>
      </div>
    </section>
  );
}
