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
      className={`inline-block font-[family-name:var(--font-montserrat)] text-[11px] font-bold uppercase tracking-[0.2em] text-teal ${className}`}
    >
      {children}
    </span>
  );
}
