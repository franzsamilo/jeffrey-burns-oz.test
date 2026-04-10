"use client";

import { motion } from "framer-motion";
import CheckItem from "@/components/ui/CheckItem";
import { patientPromises } from "@/lib/constants";

export default function PatientPromiseSection() {
  return (
    <section className="py-20 md:py-24 relative overflow-hidden">
      {/* Dark background — full bleed with photo overlay on right */}
      <div className="absolute inset-0 bg-charcoal" />
      {/* Right side: photo placeholder area showing through gradient */}
      <div className="absolute inset-0 bg-gradient-to-r from-charcoal via-charcoal/95 to-charcoal/70" />
      {/* Photo placeholder visible on right side */}
      <div className="absolute right-0 top-0 bottom-0 w-1/2 hidden lg:block">
        <div className="absolute inset-0 bg-slate-600/30" />
        <div className="absolute inset-0 flex items-center justify-center">
          <span className="text-white/10 font-[family-name:var(--font-montserrat)] text-xs uppercase tracking-widest">
            Patient Photo
          </span>
        </div>
      </div>

      <div className="relative z-10 max-w-[1200px] mx-auto px-6">
        {/* Promises — left aligned, taking roughly half the width */}
        <div className="max-w-xl">
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5 }}
          >
            <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-white mb-10">
              The Patient Promise
            </h2>
            <div className="space-y-5">
              {patientPromises.map((promise, i) => (
                <motion.div
                  key={i}
                  initial={{ opacity: 0, x: -10 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.3, delay: i * 0.08 }}
                >
                  <CheckItem className="text-white/90">{promise}</CheckItem>
                </motion.div>
              ))}
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
