"use client";

import { motion } from "framer-motion";
import Button from "@/components/ui/Button";
import { testimonials } from "@/lib/constants";

export default function TestimonialsSection() {
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
          <h2 className="font-[family-name:var(--font-playfair)] text-3xl md:text-4xl text-charcoal">
            Real Results. Real Patients.
          </h2>
          <p className="text-warm-gray mt-3">
            Real results from real patients who trusted Dr. Burns with their
            DreamSmile.
          </p>
        </motion.div>

        {/* Testimonial Cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {testimonials.map((testimonial, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: i * 0.1 }}
              className="text-center"
            >
              {/* Photo Placeholder */}
              <div className="w-28 h-28 mx-auto mb-4 bg-slate-200 rounded-full flex items-center justify-center text-slate-400 text-xs">
                Photo
              </div>

              {/* Stars */}
              <div className="flex justify-center gap-1 mb-3">
                {[...Array(5)].map((_, j) => (
                  <svg
                    key={j}
                    className="w-4 h-4 text-gold-star"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                  </svg>
                ))}
              </div>

              {/* Quote */}
              <p className="text-warm-gray text-sm leading-relaxed italic mb-4">
                &ldquo;{testimonial.quote}&rdquo;
              </p>

              {/* Attribution */}
              <p className="font-semibold text-charcoal text-sm">
                {testimonial.name}
              </p>
              <p className="text-warm-gray text-xs">{testimonial.title}</p>
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
          <Button variant="outlined" href="#quiz">
            FIND OUT IF YOU&apos;RE A CANDIDATE FOR DENTAL IMPLANTS
          </Button>
        </motion.div>
      </div>
    </section>
  );
}
