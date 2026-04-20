"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import { services } from "@/lib/constants";

export default function PrimaryServicesSection() {
  return (
    <section id="services" className="py-20 md:py-24 bg-white">
      <div className="max-w-[1200px] mx-auto px-6">
        <motion.h2
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.5 }}
          className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal text-center mb-14"
        >
          Our Primary Services
        </motion.h2>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {services.map((service, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: i * 0.1 }}
              className="group"
            >
              {/* Image Placeholder */}
              <div
                className="bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-sm w-full mb-6 overflow-hidden"
                style={{ aspectRatio: "3/2" }}
              >
                {service.title} Image
              </div>

              <h3 className="font-[family-name:var(--font-montserrat)] text-sm font-bold uppercase tracking-wider text-charcoal mb-3">
                {service.title}
              </h3>
              <p className="text-warm-gray text-sm leading-relaxed mb-5">
                {service.description}
              </p>
              <Button variant="solid" className="text-xs">
                {service.cta}
              </Button>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
