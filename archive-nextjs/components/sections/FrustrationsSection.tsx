"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import SectionLabel from "@/components/ui/SectionLabel";
import { frustrations } from "@/lib/constants";

export default function FrustrationsSection() {
  return (
    <section className="py-20 md:py-24 bg-white">
      <div className="max-w-[1200px] mx-auto px-6">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="text-center mb-14"
        >
          <SectionLabel>SOUND FAMILIAR?</SectionLabel>
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal mt-3">
            You Deserve Better Than Another Band-Aid Solution
          </h2>
          <p className="text-warm-gray mt-3 max-w-2xl mx-auto">
            If you&apos;re reading this, you&apos;ve probably experienced one or
            more of these frustrations.
          </p>
        </motion.div>

        {/* Frustration Cards */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {frustrations.map((item, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: i * 0.08 }}
              className="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow"
            >
              <div className="text-2xl mb-3">{item.icon}</div>
              <h3 className="font-semibold text-charcoal mb-2">
                {item.title}
              </h3>
              <p className="text-warm-gray text-sm leading-relaxed">
                {item.description}
              </p>
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
          <Button href="#quiz">SCHEDULE FREE DREAM SMILE ASSESSMENT</Button>
        </motion.div>
      </div>
    </section>
  );
}
