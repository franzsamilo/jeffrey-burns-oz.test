"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import { warrantyTiers } from "@/lib/constants";

export default function WarrantySection() {
  return (
    <section className="py-20 md:py-24 relative overflow-hidden">
      {/* Background placeholder — blurred dental office */}
      <div className="absolute inset-0 bg-gradient-to-br from-slate-100 via-slate-200 to-slate-100" />
      <div className="absolute inset-0 bg-white/70 backdrop-blur-sm" />

      <div className="relative z-10 max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-14"
        >
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal">
            The DreamSmile Warranty
          </h2>
          <p className="text-warm-gray mt-3">
            Every Dream Smile is backed by our exclusive warranty.
          </p>
        </motion.div>

        {/* Warranty Cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
          {warrantyTiers.map((tier, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: i * 0.1 }}
              className={`rounded-xl p-8 text-center relative ${
                tier.recommended
                  ? "bg-teal-dark text-white shadow-xl scale-105 py-10"
                  : "bg-white text-charcoal shadow-md"
              }`}
            >
              {tier.recommended && (
                <div className="absolute -top-3 left-1/2 -translate-x-1/2">
                  <span className="inline-block bg-gold-star text-white text-xs font-semibold uppercase tracking-widest px-4 py-1 rounded-full">
                    RECOMMENDED
                  </span>
                </div>
              )}
              <h3
                className={`font-[family-name:var(--font-playfair)] text-2xl font-bold mb-6 ${
                  tier.recommended ? "text-white" : "text-charcoal"
                }`}
              >
                {tier.name}
              </h3>
              <div className="space-y-4">
                <div>
                  <p
                    className={`text-xs uppercase tracking-widest font-semibold ${
                      tier.recommended ? "text-white/60" : "text-warm-gray"
                    }`}
                  >
                    Implants
                  </p>
                  <p className="text-xl font-bold mt-1">{tier.implants}</p>
                </div>
                <div
                  className={`border-t ${
                    tier.recommended ? "border-white/20" : "border-gray-100"
                  }`}
                />
                <div>
                  <p
                    className={`text-xs uppercase tracking-widest font-semibold ${
                      tier.recommended ? "text-white/60" : "text-warm-gray"
                    }`}
                  >
                    Teeth
                  </p>
                  <p className="text-xl font-bold mt-1">{tier.teeth}</p>
                </div>
              </div>
            </motion.div>
          ))}
        </div>

        {/* Bottom CTA */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5, delay: 0.3 }}
          className="text-center mt-14"
        >
          <Button href="#quiz">SCHEDULE FREE DREAMSMILE ASSESSMENT</Button>
        </motion.div>
      </div>
    </section>
  );
}
