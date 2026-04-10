type SectionLabelProps = {
  children: React.ReactNode;
  className?: string;
};

export default function SectionLabel({
  children,
  className = "",
}: SectionLabelProps) {
  return (
    <span
      className={`inline-block font-[family-name:var(--font-montserrat)] text-xs font-semibold uppercase tracking-widest text-teal ${className}`}
    >
      {children}
    </span>
  );
}
