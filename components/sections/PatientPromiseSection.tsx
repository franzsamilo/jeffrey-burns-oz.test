"use client";

import { motion } from "framer-motion";
import CheckItem from "@/components/ui/CheckItem";
import { patientPromises } from "@/lib/constants";

export default function PatientPromiseSection() {
  return (
    <section className="py-20 md:py-24 relative overflow-hidden">
      {/* Dark background with photo overlay placeholder */}
      <div className="absolute inset-0 bg-charcoal" />
      <div className="absolute inset-0 bg-gradient-to-r from-charcoal via-charcoal/90 to-charcoal/70" />

      <div className="relative z-10 max-w-[1200px] mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          {/* Left — Promises */}
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

          {/* Right — Photo Placeholder */}
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.5, delay: 0.2 }}
            className="hidden lg:block"
          >
            <div
              className="bg-slate-700 rounded-xl flex items-center justify-center text-slate-500 text-sm w-full"
              style={{ aspectRatio: "4/3" }}
            >
              Smiling Patient Photo
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
